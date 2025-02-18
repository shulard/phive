<?php declare(strict_types = 1);
namespace PharIo\Phive;

class GnupgKeyDownloader implements KeyDownloader {
    public const PATH = '/pks/lookup';

    /** @var HttpClient */
    private $httpClient;

    /** @var string[] */
    private $keyServers;

    /** @var Cli\Output */
    private $output;

    /**
     * @param string[] $keyServers
     */
    public function __construct(HttpClient $httpClient, array $keyServers, Cli\Output $output) {
        $this->httpClient = $httpClient;
        $this->keyServers = $keyServers;
        $this->output     = $output;
    }

    /**
     * @throws DownloadFailedException
     */
    public function download(string $keyId): PublicKey {
        $publicParams = [
            'search'  => '0x' . $keyId,
            'op'      => 'get',
            'options' => 'mr'
        ];
        $infoParams = \array_merge($publicParams, [
            'op' => 'index'
        ]);

        foreach ($this->keyServers as $keyServerName) {
            try {
                $keyInfo   = $this->httpClient->get((new Url('https://' . $keyServerName . self::PATH))->withParams($infoParams));
                $publicKey = $this->httpClient->get((new Url('https://' . $keyServerName . self::PATH))->withParams($publicParams));

                $this->ensureSuccess($keyInfo);
                $this->ensureSuccess($publicKey);
            } catch (HttpException $e) {
                $this->output->writeWarning(
                    \sprintf('Failed with error code %s: %s', $e->getCode(), $e->getMessage())
                );

                continue;
            }

            $this->output->writeInfo('Successfully downloaded key');

            try {
                return new PublicKey($keyId, $keyInfo->getBody(), $publicKey->getBody());
            } catch (PublicKeyException $e) {
                throw new DownloadFailedException($e->getMessage(), $e->getCode(), $e);
            }
        }

        throw new DownloadFailedException(\sprintf('PublicKey %s not found on key servers', $keyId));
    }

    /**
     * @throws HttpException
     */
    private function ensureSuccess(HttpResponse $response): void {
        if ($response->isNotFound()) {
            throw new HttpException('Key not found on keyserver', $response->getHttpCode());
        }

        if (!$response->isSuccess()) {
            throw new HttpException('Server reported an error', $response->getHttpCode());
        }
    }
}

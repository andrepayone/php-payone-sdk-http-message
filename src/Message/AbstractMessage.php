<?php

declare(strict_types=1);

namespace Payone\Sdk\Http\Message;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;

/**
 * The base class for HTTP messages.
 *
 * @author Fabian Böttcher <me@cakasim.de>
 * @since 0.1.0
 */
abstract class AbstractMessage implements MessageInterface
{
    public const PROTOCOL_VERSION_1_1 = '1.1';
    public const PROTOCOL_VERSION_2 = '2';

    /**
     * @var string The HTTP protocol version.
     */
    protected string $protocolVersion;

    /**
     * @var string[][] The HTTP headers.
     */
    protected array $headers = [];

    /**
     * @var StreamInterface The HTTP body.
     */
    protected StreamInterface $body;

    /**
     * Constructs a message.
     *
     * @param string $protocolVersion The HTTP protocol version.
     * @param StreamInterface $body The message body.
     * @param array $headers The message headers.
     */
    public function __construct(string $protocolVersion, StreamInterface $body, array $headers)
    {
        $this->setProtocolVersion($protocolVersion);
        $this->setBody($body);

        // Parse message headers to internal format.
        foreach ($headers as $name => $values) {
            $name = strval($name);
            $this->headers[strtolower($name)] = is_array($values)
                ? [$name, $values]
                : [$name, [$values]];
        }
    }

    /**
     * Perform deep copy of attributes.
     */
    public function __clone()
    {
        $this->body = clone $this->body;
    }

    /**
     * @inheritDoc
     */
    public function getProtocolVersion(): string
    {
        return $this->protocolVersion;
    }

    /**
     * Sets the HTTP protocol version.
     *
     * @param string $protocolVersion The HTTP protocol version.
     * @return $this
     */
    protected function setProtocolVersion(string $protocolVersion): self
    {
        $this->protocolVersion = $protocolVersion;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function withProtocolVersion($version): AbstractMessage|MessageInterface
    {
        return (clone $this)->setProtocolVersion($version);
    }

    /**
     * @inheritDoc
     */
    public function getHeaders(): array
    {
        $headers = [];

        foreach ($this->headers as $header) {
            $headers[$header[0]] = $header[1];
        }

        return $headers;
    }

    /**
     * @inheritDoc
     */
    public function hasHeader($name): bool
    {
        return isset($this->headers[strtolower($name)]);
    }

    /**
     * @inheritDoc
     */
    public function getHeader($name): array|string
    {
        return $this->headers[strtolower($name)][1] ?? [];
    }

    /**
     * Sets a header field.
     *
     * @param string $name The name of the header.
     * @param string[] $value The values of the header.
     * @return $this
     */
    protected function setHeader(string $name, array $value): self
    {
        $this->headers[strtolower($name)] = [$name, array_filter($value, function ($item) {
            // Filter non and empty strings.
            return is_string($item) && !empty($item);
        })];

        return $this;
    }

    /**
     * Adds a value to an existing header field.
     *
     * @param string $name The name of the existing header.
     * @param string[] $value The values to add to the existing header.
     * @return $this
     */
    protected function addHeader(string $name, array $value): self
    {
        $header = $this->getHeader($name);
        if (!is_array($header)) {
            $header = [$header];
        }
        $this->setHeader(
            $name,
            $this->hasHeader($name)
                ? array_merge($header, $value)
                : $value
        );

        return $this;
    }

    /**
     * Removes an existing header field.
     *
     * @param string $name The name of the header.
     * @return $this
     */
    protected function removeHeader(string $name): self
    {
        unset($this->headers[strtolower($name)]);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getHeaderLine($name): string
    {
        $header = $this->getHeader($name);
        if (!is_array($header)) {
            $header = [$header];
        }

        return join(',', $header);
    }

    /**
     * @inheritDoc
     */
    public function withHeader($name, $value): AbstractMessage|MessageInterface
    {
        return (clone $this)->setHeader(
            $name,
            is_array($value)
                ? $value
                : [$value]
        );
    }

    /**
     * @inheritDoc
     */
    public function withAddedHeader($name, $value): AbstractMessage|MessageInterface
    {
        return (clone $this)->addHeader(
            $name,
            is_array($value)
                ? $value
                : [$value]
        );
    }

    /**
     * @inheritDoc
     */
    public function withoutHeader($name): AbstractMessage|MessageInterface
    {
        return (clone $this)->removeHeader($name);
    }

    /**
     * @inheritDoc
     */
    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    /**
     * Sets the message body.
     *
     * @param StreamInterface $body The message body.
     * @return $this
     */
    protected function setBody(StreamInterface $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function withBody(StreamInterface $body): AbstractMessage|MessageInterface
    {
        return (clone $this)->setBody($body);
    }
}

<?php declare(strict_types = 1);

namespace SandwaveIo\RealtimeRegister\Domain;

final class Provider implements DomainObjectInterface
{
    /** @var string */
    public $name;

    /** @var string[]|null */
    public $tlds;

    private function __construct(
        string $name,
        ?array $tlds
    ) {
        $this->name = $name;
        $this->tlds = $tlds;
    }

    public static function fromArray(array $json): Provider
    {
        return new Provider(
            $json['name'],
            $json['tlds'] ?? []
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'tlds' => $this->tlds,
        ], function ($x) {
            return ! is_null($x);
        });
    }
}

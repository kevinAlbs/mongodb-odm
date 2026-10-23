<?php

declare(strict_types=1);

namespace Documents\Encryption;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Document with a root-level encrypted field and a single embedded document
 * containing encrypted fields.
 */
#[ODM\Document(collection: 'citizen')]
class Citizen
{
    #[ODM\Id]
    public ?string $id;

    public function __construct(
        #[ODM\Field]
        #[ODM\Encrypt]
        public string $nationalId,
        #[ODM\EmbedOne(targetDocument: Phone::class)]
        public Phone $phone,
    ) {
    }
}

<?php

declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;
use Encoder\Encoder;
use Encoder\SerpentStrategy;
use Encoder\TwofishStrategy;
use Encoder\CustomStrategy;

class EncoderTest extends TestCase
{
    public function test_if_text_is_properly_encoded_with_3_wrapped_strategies()
    {
        $encoder = new Encoder(new SerpentStrategy(new TwofishStrategy(new CustomStrategy())));

        $encodedText = $encoder->encode('secret text', 'pass01');

        self::assertEquals(
            'secret text encoded with Serpent encoded with Twofish encoded with our custom algorithm',
            $encodedText
        );
    }
}
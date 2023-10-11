<?php

/*
 * This file is part of GitHub Profile Views Counter.
 *
 * (c) Anton Komarev <anton@komarev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Komarev\GitHubProfileViewsCounter;

use Webmozart\Assert\Assert;

final class Username
{
    private const LENGTH_MIN = 1;
    private const LENGTH_MAX = 39;

    /**
     * RegEx adapted from https://github.com/shinnn/github-username-regex/blob/master/index.js
     */
    private const REGEX = '#^[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,38}$#i';

    private string $username;

    public function __construct(
        string $username
    ) {
        Assert::minLength($username, self::LENGTH_MIN);
        Assert::maxLength($username, self::LENGTH_MAX);
        Assert::regex(
            $username,
            self::REGEX,
            'Username may only contain alphanumeric characters or single hyphens, and cannot begin or end with a hyphen.'
        );

        $this->username = strtolower($username);
    }

    public function __toString(): string
    {
        return $this->username;
    }
}

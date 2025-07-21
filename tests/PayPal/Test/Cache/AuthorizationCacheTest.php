<?php

namespace PayPal\Test\Cache;

use PayPal\Cache\AuthorizationCache;
use PHPUnit\Framework\TestCase;

/**
 * Test class for AuthorizationCacheTest.
 *
 */
class AuthorizationCacheTest extends TestCase
{
    const CACHE_FILE = 'tests/var/test.cache';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public static function EnabledProvider(): array
    {
        return [
            [['cache.enabled' => 'true'], true],
            [['cache.enabled' => true], true],
        ];
    }

    public static function CachePathProvider(): array
    {
        return [
            [['cache.FileName' => 'temp.cache'], 'temp.cache']
        ];
    }

    /**
     *
     * @dataProvider EnabledProvider
     */
    public function testIsEnabled(array $config, bool $expected): void
    {
        $result = AuthorizationCache::isEnabled($config);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider CachePathProvider
     */
    public function testCachePath(array $config, string $expected): void
    {
        $result = AuthorizationCache::cachePath($config);
        $this->assertContains($expected, $result);
    }

    public function testCacheDisabled(): void
    {
        // 'cache.enabled' => true,
        AuthorizationCache::push('clientId', 'accessToken', 'tokenCreateTime', 'tokenExpiresIn', ['cache.enabled' => false]);
        AuthorizationCache::pull(['cache.enabled' => false], 'clientId');
    }

    public function testCachePush(): void
    {
        AuthorizationCache::push('clientId', 'accessToken', 'tokenCreateTime', 'tokenExpiresIn', ['cache.enabled' => true, 'cache.FileName' => AuthorizationCacheTest::CACHE_FILE]);
        $contents = file_get_contents(AuthorizationCacheTest::CACHE_FILE);
        $tokens = json_decode($contents, true);
        $this->assertNotNull($contents);
        $this->assertEquals('clientId', $tokens['clientId']['clientId']);
        $this->assertEquals('accessToken', $tokens['clientId']['accessTokenEncrypted']);
        $this->assertEquals('tokenCreateTime', $tokens['clientId']['tokenCreateTime']);
        $this->assertEquals('tokenExpiresIn', $tokens['clientId']['tokenExpiresIn']);
    }

    public function testCachePullNonExisting(): void
    {
        $result = AuthorizationCache::pull(['cache.enabled' => true, 'cache.FileName' => AuthorizationCacheTest::CACHE_FILE], 'clientIdUndefined');
        $this->assertNull($result);
    }

    /**
     * @depends testCachePush
     */
    public function testCachePull(): void
    {
        $result = AuthorizationCache::pull(['cache.enabled' => true, 'cache.FileName' => AuthorizationCacheTest::CACHE_FILE], 'clientId');
        $this->assertNotNull($result);
        $this->assertInternalType('array', $result);
        $this->assertEquals('clientId', $result['clientId']);
        $this->assertEquals('accessToken', $result['accessTokenEncrypted']);
        $this->assertEquals('tokenCreateTime', $result['tokenCreateTime']);
        $this->assertEquals('tokenExpiresIn', $result['tokenExpiresIn']);

        unlink(AuthorizationCacheTest::CACHE_FILE);
    }
}

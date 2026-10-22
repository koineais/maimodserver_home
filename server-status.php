<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$cachePath = sys_get_temp_dir() . '/maimodserver-status-v1.json';
$cached = null;
$cacheContents = @file_get_contents($cachePath);
if ($cacheContents !== false) {
    $decodedCache = json_decode($cacheContents, true);
    if (is_array($decodedCache) && isset($decodedCache['state'], $decodedCache['checkedAt'])) {
        $cached = $decodedCache;
        if (time() - (int) $cached['checkedAt'] < 30) {
            echo json_encode($cached, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
            exit;
        }
    }
}

$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'timeout' => 2,
        'header' => "Accept: application/json\r\nUser-Agent: maimodserver-status/1.0\r\n",
    ],
    'ssl' => [
        'verify_peer' => true,
        'verify_peer_name' => true,
    ],
]);

$response = @file_get_contents('https://api.mcsrvstat.us/3/maimodserver.aternos.me', false, $context);
$payload = $response === false ? null : json_decode($response, true);

if (is_array($payload) && array_key_exists('online', $payload)) {
    $players = is_array($payload['players'] ?? null) ? $payload['players'] : [];
    $status = [
        'state' => $payload['online'] === true ? 'online' : 'offline',
        'playersOnline' => max(0, (int) ($players['online'] ?? 0)),
        'playersMax' => max(0, (int) ($players['max'] ?? 0)),
        'checkedAt' => time(),
        'stale' => false,
    ];
    @file_put_contents($cachePath, json_encode($status, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR), LOCK_EX);
} elseif ($cached !== null) {
    $status = $cached;
    $status['stale'] = true;
} else {
    $status = [
        'state' => 'unknown',
        'playersOnline' => 0,
        'playersMax' => 0,
        'checkedAt' => time(),
        'stale' => false,
    ];
}

echo json_encode($status, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
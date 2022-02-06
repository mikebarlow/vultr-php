<?php

namespace Vultr\VultrPhp\Snapshots;

use Throwable;
use Vultr\VultrPhp\Services\VultrServiceException;

class SnapshotException extends VultrServiceException
{
	public function __construct(string $message, ?int $http_code = null, ?Throwable $previous = null)
	{
		parent::__construct($message, VultrServiceException::SNAPSHOT_CODE, $http_code, $previous);
	}
}

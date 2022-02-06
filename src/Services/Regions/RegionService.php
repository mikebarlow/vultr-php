<?php

namespace Vultr\VultrPhp\Services\Regions;

use Vultr\VultrPhp\Services\VultrServiceException;
use Vultr\VultrPhp\Services\VultrService;
use Vultr\VultrPhp\Util\ListOptions;

class RegionService extends VultrService
{
	private static ?array $region_cache = null;

	/**
	* @param $per_page
	* @param $cursor
	*/
	public function getRegions(?ListOptions &$options = null) : array
	{
		$regions = [];
		try
		{
			if ($options === null)
			{
				$options = new ListOptions(100);
			}
			$regions = $this->list('regions', new Region(), $options);
		}
		catch (VultrServiceException $e)
		{
			throw new RegionException("Failed to get regions: " .$e->getMessage(), $e->getHTTPCode(), $e);
		}

		return $regions;
	}

	public function cacheRegions() : void
	{
		if (static::$region_cache !== null) return;

		static::$region_cache = [];
		$options = new ListOptions(500);
		foreach ($this->getRegions($options) as $region)
		{
			static::$region_cache[$region->getId()] = $region;
		}
	}

	public function getRegion(string $id) : ?Region
	{
		$this->cacheRegions();
		return static::$region_cache[$id] ?? null;
	}
}
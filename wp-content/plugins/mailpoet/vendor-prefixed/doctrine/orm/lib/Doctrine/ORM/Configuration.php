<?php
 namespace MailPoetVendor\Doctrine\ORM; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\Common\Annotations\AnnotationReader; use MailPoetVendor\Doctrine\Common\Annotations\AnnotationRegistry; use MailPoetVendor\Doctrine\Common\Annotations\CachedReader; use MailPoetVendor\Doctrine\Common\Annotations\SimpleAnnotationReader; use MailPoetVendor\Doctrine\Common\Cache\ArrayCache; use MailPoetVendor\Doctrine\Common\Cache\Cache as CacheDriver; use MailPoetVendor\Doctrine\Common\Proxy\AbstractProxyFactory; use MailPoetVendor\Doctrine\ORM\Cache\CacheConfiguration; use MailPoetVendor\Doctrine\Common\Persistence\Mapping\Driver\MappingDriver; use MailPoetVendor\Doctrine\ORM\Mapping\DefaultEntityListenerResolver; use MailPoetVendor\Doctrine\ORM\Mapping\DefaultNamingStrategy; use MailPoetVendor\Doctrine\ORM\Mapping\DefaultQuoteStrategy; use MailPoetVendor\Doctrine\ORM\Mapping\Driver\AnnotationDriver; use MailPoetVendor\Doctrine\ORM\Mapping\EntityListenerResolver; use MailPoetVendor\Doctrine\ORM\Mapping\NamingStrategy; use MailPoetVendor\Doctrine\ORM\Mapping\QuoteStrategy; use MailPoetVendor\Doctrine\ORM\Repository\DefaultRepositoryFactory; use MailPoetVendor\Doctrine\ORM\Repository\RepositoryFactory; class Configuration extends \MailPoetVendor\Doctrine\DBAL\Configuration { public function setProxyDir($dir) { $this->_attributes['proxyDir'] = $dir; } public function getProxyDir() { return isset($this->_attributes['proxyDir']) ? $this->_attributes['proxyDir'] : null; } public function getAutoGenerateProxyClasses() { return isset($this->_attributes['autoGenerateProxyClasses']) ? $this->_attributes['autoGenerateProxyClasses'] : \MailPoetVendor\Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_ALWAYS; } public function setAutoGenerateProxyClasses($autoGenerate) { $this->_attributes['autoGenerateProxyClasses'] = (int) $autoGenerate; } public function getProxyNamespace() { return isset($this->_attributes['proxyNamespace']) ? $this->_attributes['proxyNamespace'] : null; } public function setProxyNamespace($ns) { $this->_attributes['proxyNamespace'] = $ns; } public function setMetadataDriverImpl(\MailPoetVendor\Doctrine\Common\Persistence\Mapping\Driver\MappingDriver $driverImpl) { $this->_attributes['metadataDriverImpl'] = $driverImpl; } public function newDefaultAnnotationDriver($paths = array(), $useSimpleAnnotationReader = \true) { \MailPoetVendor\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__ . '/Mapping/Driver/DoctrineAnnotations.php'); if ($useSimpleAnnotationReader) { $reader = new \MailPoetVendor\Doctrine\Common\Annotations\SimpleAnnotationReader(); $reader->addNamespace('MailPoetVendor\\Doctrine\\ORM\\Mapping'); $cachedReader = new \MailPoetVendor\Doctrine\Common\Annotations\CachedReader($reader, new \MailPoetVendor\Doctrine\Common\Cache\ArrayCache()); return new \MailPoetVendor\Doctrine\ORM\Mapping\Driver\AnnotationDriver($cachedReader, (array) $paths); } return new \MailPoetVendor\Doctrine\ORM\Mapping\Driver\AnnotationDriver(new \MailPoetVendor\Doctrine\Common\Annotations\CachedReader(new \MailPoetVendor\Doctrine\Common\Annotations\AnnotationReader(), new \MailPoetVendor\Doctrine\Common\Cache\ArrayCache()), (array) $paths); } public function addEntityNamespace($alias, $namespace) { $this->_attributes['entityNamespaces'][$alias] = $namespace; } public function getEntityNamespace($entityNamespaceAlias) { if (!isset($this->_attributes['entityNamespaces'][$entityNamespaceAlias])) { throw \MailPoetVendor\Doctrine\ORM\ORMException::unknownEntityNamespace($entityNamespaceAlias); } return \trim($this->_attributes['entityNamespaces'][$entityNamespaceAlias], '\\'); } public function setEntityNamespaces(array $entityNamespaces) { $this->_attributes['entityNamespaces'] = $entityNamespaces; } public function getEntityNamespaces() { return $this->_attributes['entityNamespaces']; } public function getMetadataDriverImpl() { return isset($this->_attributes['metadataDriverImpl']) ? $this->_attributes['metadataDriverImpl'] : null; } public function getQueryCacheImpl() { return isset($this->_attributes['queryCacheImpl']) ? $this->_attributes['queryCacheImpl'] : null; } public function setQueryCacheImpl(\MailPoetVendor\Doctrine\Common\Cache\Cache $cacheImpl) { $this->_attributes['queryCacheImpl'] = $cacheImpl; } public function getHydrationCacheImpl() { return isset($this->_attributes['hydrationCacheImpl']) ? $this->_attributes['hydrationCacheImpl'] : null; } public function setHydrationCacheImpl(\MailPoetVendor\Doctrine\Common\Cache\Cache $cacheImpl) { $this->_attributes['hydrationCacheImpl'] = $cacheImpl; } public function getMetadataCacheImpl() { return isset($this->_attributes['metadataCacheImpl']) ? $this->_attributes['metadataCacheImpl'] : null; } public function setMetadataCacheImpl(\MailPoetVendor\Doctrine\Common\Cache\Cache $cacheImpl) { $this->_attributes['metadataCacheImpl'] = $cacheImpl; } public function addNamedQuery($name, $dql) { $this->_attributes['namedQueries'][$name] = $dql; } public function getNamedQuery($name) { if (!isset($this->_attributes['namedQueries'][$name])) { throw \MailPoetVendor\Doctrine\ORM\ORMException::namedQueryNotFound($name); } return $this->_attributes['namedQueries'][$name]; } public function addNamedNativeQuery($name, $sql, \MailPoetVendor\Doctrine\ORM\Query\ResultSetMapping $rsm) { $this->_attributes['namedNativeQueries'][$name] = array($sql, $rsm); } public function getNamedNativeQuery($name) { if (!isset($this->_attributes['namedNativeQueries'][$name])) { throw \MailPoetVendor\Doctrine\ORM\ORMException::namedNativeQueryNotFound($name); } return $this->_attributes['namedNativeQueries'][$name]; } public function ensureProductionSettings() { $queryCacheImpl = $this->getQueryCacheImpl(); if (!$queryCacheImpl) { throw \MailPoetVendor\Doctrine\ORM\ORMException::queryCacheNotConfigured(); } if ($queryCacheImpl instanceof \MailPoetVendor\Doctrine\Common\Cache\ArrayCache) { throw \MailPoetVendor\Doctrine\ORM\ORMException::queryCacheUsesNonPersistentCache($queryCacheImpl); } $metadataCacheImpl = $this->getMetadataCacheImpl(); if (!$metadataCacheImpl) { throw \MailPoetVendor\Doctrine\ORM\ORMException::metadataCacheNotConfigured(); } if ($metadataCacheImpl instanceof \MailPoetVendor\Doctrine\Common\Cache\ArrayCache) { throw \MailPoetVendor\Doctrine\ORM\ORMException::metadataCacheUsesNonPersistentCache($metadataCacheImpl); } if ($this->getAutoGenerateProxyClasses()) { throw \MailPoetVendor\Doctrine\ORM\ORMException::proxyClassesAlwaysRegenerating(); } } public function addCustomStringFunction($name, $className) { if (\MailPoetVendor\Doctrine\ORM\Query\Parser::isInternalFunction($name)) { throw \MailPoetVendor\Doctrine\ORM\ORMException::overwriteInternalDQLFunctionNotAllowed($name); } $this->_attributes['customStringFunctions'][\strtolower($name)] = $className; } public function getCustomStringFunction($name) { $name = \strtolower($name); return isset($this->_attributes['customStringFunctions'][$name]) ? $this->_attributes['customStringFunctions'][$name] : null; } public function setCustomStringFunctions(array $functions) { foreach ($functions as $name => $className) { $this->addCustomStringFunction($name, $className); } } public function addCustomNumericFunction($name, $className) { if (\MailPoetVendor\Doctrine\ORM\Query\Parser::isInternalFunction($name)) { throw \MailPoetVendor\Doctrine\ORM\ORMException::overwriteInternalDQLFunctionNotAllowed($name); } $this->_attributes['customNumericFunctions'][\strtolower($name)] = $className; } public function getCustomNumericFunction($name) { $name = \strtolower($name); return isset($this->_attributes['customNumericFunctions'][$name]) ? $this->_attributes['customNumericFunctions'][$name] : null; } public function setCustomNumericFunctions(array $functions) { foreach ($functions as $name => $className) { $this->addCustomNumericFunction($name, $className); } } public function addCustomDatetimeFunction($name, $className) { if (\MailPoetVendor\Doctrine\ORM\Query\Parser::isInternalFunction($name)) { throw \MailPoetVendor\Doctrine\ORM\ORMException::overwriteInternalDQLFunctionNotAllowed($name); } $this->_attributes['customDatetimeFunctions'][\strtolower($name)] = $className; } public function getCustomDatetimeFunction($name) { $name = \strtolower($name); return isset($this->_attributes['customDatetimeFunctions'][$name]) ? $this->_attributes['customDatetimeFunctions'][$name] : null; } public function setCustomDatetimeFunctions(array $functions) { foreach ($functions as $name => $className) { $this->addCustomDatetimeFunction($name, $className); } } public function setCustomHydrationModes($modes) { $this->_attributes['customHydrationModes'] = array(); foreach ($modes as $modeName => $hydrator) { $this->addCustomHydrationMode($modeName, $hydrator); } } public function getCustomHydrationMode($modeName) { return isset($this->_attributes['customHydrationModes'][$modeName]) ? $this->_attributes['customHydrationModes'][$modeName] : null; } public function addCustomHydrationMode($modeName, $hydrator) { $this->_attributes['customHydrationModes'][$modeName] = $hydrator; } public function setClassMetadataFactoryName($cmfName) { $this->_attributes['classMetadataFactoryName'] = $cmfName; } public function getClassMetadataFactoryName() { if (!isset($this->_attributes['classMetadataFactoryName'])) { $this->_attributes['classMetadataFactoryName'] = 'MailPoetVendor\\Doctrine\\ORM\\Mapping\\ClassMetadataFactory'; } return $this->_attributes['classMetadataFactoryName']; } public function addFilter($name, $className) { $this->_attributes['filters'][$name] = $className; } public function getFilterClassName($name) { return isset($this->_attributes['filters'][$name]) ? $this->_attributes['filters'][$name] : null; } public function setDefaultRepositoryClassName($className) { $reflectionClass = new \ReflectionClass($className); if (!$reflectionClass->implementsInterface('MailPoetVendor\\Doctrine\\Common\\Persistence\\ObjectRepository')) { throw \MailPoetVendor\Doctrine\ORM\ORMException::invalidEntityRepository($className); } $this->_attributes['defaultRepositoryClassName'] = $className; } public function getDefaultRepositoryClassName() { return isset($this->_attributes['defaultRepositoryClassName']) ? $this->_attributes['defaultRepositoryClassName'] : 'MailPoetVendor\\Doctrine\\ORM\\EntityRepository'; } public function setNamingStrategy(\MailPoetVendor\Doctrine\ORM\Mapping\NamingStrategy $namingStrategy) { $this->_attributes['namingStrategy'] = $namingStrategy; } public function getNamingStrategy() { if (!isset($this->_attributes['namingStrategy'])) { $this->_attributes['namingStrategy'] = new \MailPoetVendor\Doctrine\ORM\Mapping\DefaultNamingStrategy(); } return $this->_attributes['namingStrategy']; } public function setQuoteStrategy(\MailPoetVendor\Doctrine\ORM\Mapping\QuoteStrategy $quoteStrategy) { $this->_attributes['quoteStrategy'] = $quoteStrategy; } public function getQuoteStrategy() { if (!isset($this->_attributes['quoteStrategy'])) { $this->_attributes['quoteStrategy'] = new \MailPoetVendor\Doctrine\ORM\Mapping\DefaultQuoteStrategy(); } return $this->_attributes['quoteStrategy']; } public function setEntityListenerResolver(\MailPoetVendor\Doctrine\ORM\Mapping\EntityListenerResolver $resolver) { $this->_attributes['entityListenerResolver'] = $resolver; } public function getEntityListenerResolver() { if (!isset($this->_attributes['entityListenerResolver'])) { $this->_attributes['entityListenerResolver'] = new \MailPoetVendor\Doctrine\ORM\Mapping\DefaultEntityListenerResolver(); } return $this->_attributes['entityListenerResolver']; } public function setRepositoryFactory(\MailPoetVendor\Doctrine\ORM\Repository\RepositoryFactory $repositoryFactory) { $this->_attributes['repositoryFactory'] = $repositoryFactory; } public function getRepositoryFactory() { return isset($this->_attributes['repositoryFactory']) ? $this->_attributes['repositoryFactory'] : new \MailPoetVendor\Doctrine\ORM\Repository\DefaultRepositoryFactory(); } public function isSecondLevelCacheEnabled() { return isset($this->_attributes['isSecondLevelCacheEnabled']) ? $this->_attributes['isSecondLevelCacheEnabled'] : \false; } public function setSecondLevelCacheEnabled($flag = \true) { $this->_attributes['isSecondLevelCacheEnabled'] = (bool) $flag; } public function setSecondLevelCacheConfiguration(\MailPoetVendor\Doctrine\ORM\Cache\CacheConfiguration $cacheConfig) { $this->_attributes['secondLevelCacheConfiguration'] = $cacheConfig; } public function getSecondLevelCacheConfiguration() { if (!isset($this->_attributes['secondLevelCacheConfiguration']) && $this->isSecondLevelCacheEnabled()) { $this->_attributes['secondLevelCacheConfiguration'] = new \MailPoetVendor\Doctrine\ORM\Cache\CacheConfiguration(); } return isset($this->_attributes['secondLevelCacheConfiguration']) ? $this->_attributes['secondLevelCacheConfiguration'] : null; } public function getDefaultQueryHints() { return isset($this->_attributes['defaultQueryHints']) ? $this->_attributes['defaultQueryHints'] : array(); } public function setDefaultQueryHints(array $defaultQueryHints) { $this->_attributes['defaultQueryHints'] = $defaultQueryHints; } public function getDefaultQueryHint($name) { return isset($this->_attributes['defaultQueryHints'][$name]) ? $this->_attributes['defaultQueryHints'][$name] : \false; } public function setDefaultQueryHint($name, $value) { $this->_attributes['defaultQueryHints'][$name] = $value; } } 
{**
 * plugins/importexport/crossref/index.tpl
 *
 * Copyright (c) 2013-2014 Simon Fraser University Library
 * Copyright (c) 2003-2014 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * List of operations this plugin can perform
 *}
{strip}
{assign var="pageTitle" value="plugins.importexport.crossref.displayName"}
{include file="common/header.tpl"}
{/strip}

<br/>

<h3>{translate key="plugins.importexport.crossref.export"}</h3>
{if $doiPrefix}
	<ul class="plain">
		<li>&#187; <a href="{plugin_url path="issues"}">{translate key="plugins.importexport.crossref.export.issues"}</a></li>
		<li>&#187; <a href="{plugin_url path="articles"}">{translate key="plugins.importexport.crossref.export.articles"}</a></li>
	</ul>
{else}
	{translate key="plugins.importexport.crossref.errors.noDOIprefix"} <br /><br />
{/if}

{include file="common/footer.tpl"}

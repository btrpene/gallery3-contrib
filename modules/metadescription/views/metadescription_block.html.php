<?php defined("SYSPATH") or die("No direct script access.") ?>
<?
  $item = $theme->item;
  $metaTags = "";
  if (count($tags) > 0) {
    for ($counter=0; $counter<count($tags); $counter++) {
      if ($counter < count($tags)-1) {
        $metaTags = $metaTags . p::clean($tags[$counter]->name) . ",";
      } else {
        $metaTags = $metaTags . p::clean($tags[$counter]->name);
      }
    }  
  }
  
  $metaDescription = "";
  $metaDescription = trim(nl2br(p::purify($item->description)));
  // If description is empty, use title instead.
  if ($metaDescription == "") {
    $metaDescription = p::clean($item->title);
  }
  // Strip HTML
  $metaDescription = strip_tags($metaDescription);
  // Strip Line Breaks
  $metaDescription = str_replace("\n", " ", $metaDescription);
  // Limit Description to 150 characters.
  $metaDescription = substr($metaDescription, 0,150);
?>
<META NAME="KEYWORDS" CONTENT="<?= $metaTags ?>">
<META NAME="DESCRIPTION" CONTENT="<?= $metaDescription ?>">
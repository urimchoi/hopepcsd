<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: 
  template:
    - connect-item-serve
files: true
fields:
  blurb: 
    label: Introduction
    type:  textarea
    size: large
  inreach: 
    label: In-Reach Description
    type:  textarea
    size: large
  outreach: 
    label: Out-Reach Description
    type:  textarea
    size: large
  upreach: 
    label: Up-Reach Description
    type:  textarea
    size: large
  education: 
    label: Education Description
    type:  textarea
    size: large
<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: 
  template:
    - sermon
    - events
files: true
fields:
  title: 
    label: Title
    type:  text
  text: 
    label: Text
    type:  textarea
    size:  large
  eminfo:
    label: English Ministry Info
    type: text
  kminfo:
    label: Korean Ministry Info
    type: text
  yminfo:
    label: Youth Ministry Info
    type: text
filefields:
  title:
    label: Title
    type: text
  caption:
    label: Caption
    type: text
  link:
    label: Link
    type: text
  inverse:
    label: Inverse Heading Color?
    type: text
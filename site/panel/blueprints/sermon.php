<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Page
pages: 
  template: sermon-series
files: true
fields:
  title: 
    label: Title
    type:  text
  showcount:
    label: How many sermons to show per page
    type: select
    options:
      5: 5
      10: 10
      15: 15
filefields:
  title:
    label: Title
    type: text
  caption:
    label: Caption
    type: text
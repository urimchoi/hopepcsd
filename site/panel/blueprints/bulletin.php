<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Bulletin
pages: false
files: true
fields:
  title: 
    label: Title
    type:  text
  bulletin:
    label: Show bulletin link on this day
    type: select
    options:
      Sunday: Sunday
      Monday: Monday
      Tuesday: Tuesday
      Wednesday: Wednesday
      Thursday: Thursday
      Friday: Friday
      Saturday: Saturday
filefields:
  title:
    label: Title
    type: text
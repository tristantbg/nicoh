<?php if(!defined('KIRBY')) exit ?>

title: Texts
pages:
  template: text
files: true
fields:
  title:
    label: Title
    type:  text
    width: 2/3
  random:
    label: Random at start
    type: toggle
    options: yes/no
    default: yes
    columns: 1
    width: 1/3
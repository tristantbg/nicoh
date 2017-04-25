<?php if(!defined('KIRBY')) exit ?>

title: Images
pages: true
files:
  fields:
    itemcaption:
      label: Caption
      type: text
    itemdate:
      label: Date
      type: date
    itemlink:
      label: Link
      type: url
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
  gallery:
    label: Images
    type: gallery
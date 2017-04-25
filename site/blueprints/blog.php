<?php if(!defined('KIRBY')) exit ?>

title: Blog
pages:
  template: article
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
  palette:
    label: Color Palette
    type:  structure
    entry: >
          <div style="width: 50px; height: 50px; background: {{color}}">
    fields:
      color:
        label: Color
        type: color
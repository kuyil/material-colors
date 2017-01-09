#!/bin/bash
filename=`basename -s ".svg" $1`
mkdir -p mdpi hdpi xhdpi xxhdpi xxxhdpi playstore
inkscape -z --export-area-page -w 48 -h 48 --export-png=mipmap-mdpi/$filename.png $1
inkscape -z --export-area-page -w 72 -h 72 --export-png=mipmap-hdpi/$filename.png $1
inkscape -z --export-area-page -w 96 -h 96 --export-png=mipmap-xhdpi/$filename.png $1
inkscape -z --export-area-page -w 144 -h 144 --export-png=mipmap-xxhdpi/$filename.png $1
inkscape -z --export-area-page -w 192 -h 192 --export-png=mipmap-xxxhdpi/$filename.png $1

inkscape -z --export-area-page -w 512 -h 512 --export-png=playstore/$filename.png $1

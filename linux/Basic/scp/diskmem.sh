#!/bin/bash

date    >> diskmem.log
echo "-----------------------------------------------------" >> diskmem.log
df -H   >> diskmem.log
echo "-----------------------------------------------------" >> diskmem.log
free -m >> diskmem.log
echo "-----------------------------------------------------" >> diskmem.log


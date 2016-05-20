#!/usr/bin/env python

import scrollphat
import math
import time
import sys

i = 0
buf = [0] * 11
scrollphat.set_brightness(20)

buf[0] =4; 

scrollphat.set_buffer(buf)
scrollphat.update()


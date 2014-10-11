Stringmaker is an online tool for generation of test strings for spacing and kerning. 

It’s a very targeted, very limited, but potentially quite useful tool for what it does: If you need a string that shows for instance all numbers next to all lowercase letters, this tool can quickly generate that for you. You can then paste the generated string into your font editor or layout program of choice, format as needed, and get on with your merry testing.

![stringmaker screenshot](/screenshot.gif)

I wrote it in 2011 and published it [http://ninastoessinger.com/stringmaker/], have been using it since, but always lacked the time or motivation to make it better; so now I am posting the source here. It’s not pretty code and it’s not code I’m particularly proud of, but maybe it can be useful, also for others to build upon and adapt for their needs. Or maybe not. :) 

Some known things from my side:
- Custom lists of characters need to be whitespace-delimited. (This seems to be an occasional source of user error/confusion.)
- The “base” (fill characters between the ones to be tested) can be custom, but is currently limited to a length of 2 characters. IIRC this is mostly because of the JavaScript live pattern preview (which was harder to make work than the actual generation of the string, which is done in PHP).
- The line-wrapping option is quite simple, read brutal; it can split entities where those span multiple characters.
- I know, It’s kind of ugly code.

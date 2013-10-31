ValidateEmail
=============

Validate email function. 
Specification  http://ols.ietf.org/html/rfc3696

All of these should succeed:
dclo@us.ibm.com
abc\\@def@example.com
abc\\\\@example.com
Fred\\ Bloggs@example.com
Joe.\\\\Blow@example.com
\"Abc@def\"@example.com
\"Fred Bloggs\"@example.com
customer/department=shipping@example.com
\$A12345@example.com
!def!xyz%abc@example.com
_somename@example.com
user+mailbox@example.com
peter.piper@example.com
Doug\\ \\\"Ace\\\"\\ Lovell@example.com
\"Doug \\\"Ace\\\" L.\"@example.com

All of these should fail:
abc@def@example.com
abc\\\\@def@example.com
abc\\@example.com
@example.com
doug@
\"qu@example.com
ote\"@example.com
.dot@example.com
dot.@example.com
two..dot@example.com
\"Doug \"Ace\" L.\"@example.com
Doug\\ \\\"Ace\\\"\\ L\\.@example.com
hello world@example.com
gatsby@f.sc.ot.t.f.i.tzg.era.l.d.

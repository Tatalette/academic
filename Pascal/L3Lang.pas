program L3Lang;

PROGRAM::=program ID;BLOCK .
BLOCK::=CONSTS VARS INSTS
CONSTS::const ID = NUM; {ID = NUM;}|
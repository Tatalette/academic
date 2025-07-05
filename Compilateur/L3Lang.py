import warnings
def add(pile:list)->None:
    pile[-2]=pile[-1]+pile[-2]
    pile.pop(-1)

def eql(pile:list)->None:
    if pile[-1]==pile[-2]:
        pile.pop(-1)
        pile[-1]=1
    else:
        pile.pop(-1)
        pile[-1]=0
        
def prn(pile:list)->None:
    print(pile[-1])
    pile.pop(-1)
    
def inn(pile:list,const:int)->None:
    pile[0]=const
    pile.pop(-1)
    
def intC(pile:list, const:int, index:int)->None:
    if index < len(pile):
        pile[index] = const
    else:
        warnings.warn("Index hors de portée")

        
def ldiv(pile:list,value:float)->None:
    pile.append(value)

def ldaa(pile:list,value:float)->None:
    if value in [0,1,2]:
        pile.append(value)
    else:
        warnings.warn("Valeur incompatible")
    
def ldv(pile:list)->None:
    index = pile[-1]
    if 0 <= index < len(pile):
        pile[-1] = pile[index]
    else:
        warnings.warn("Référence hors de pile")

        
def sto(pile:list)->None:
    if pile[-2] < len(pile):
        pile[pile[-2]]=pile[-1]
        pile.pop(-1);pile.pop(-1)
    else:
        warnings.warn("Référence hors de pile")
    

        
def brni(index:list,instruction:int)->None:
    index[0] = instruction
    
def bzei(pile:list,index:list,instruction:int)->None:
    if instruction < len(pile):
        if pile[-1] == 0:
            index[0] = instruction
            pile[-1].pop()
    else:
        warnings.warn("Erreur, index hors de portée")

def halte(halte:bool)->None:
    return 0
    
def interpreter(p_code: list):
    pile = []
    # pour instructions
    mem = [0] * 1000  
    #Pointeur
    ip = 0
    halt = False

    while ip < len(p_code) and not halt:
        instr = p_code[ip]
        opcode = instr[0]
        args = instr[1:] if len(instr) > 1 else []

        if opcode == "ADD":
            add(pile)
        elif opcode == "EQL":
            eql(pile)
        elif opcode == "PRN":
            prn(pile)
        elif opcode == "INN":
            inn(pile, args[0])
        elif opcode == "INT":
            intC(pile, args[0], [0])
        elif opcode == "LDI":
            ldiv(pile, args[0])
        elif opcode == "LDA":
            ldaa(pile, args[0])
        elif opcode == "LDV":
            ldv(pile)
        elif opcode == "STO":
            sto(pile)
        elif opcode == "BRN":
            ip = args[0]
            continue
        elif opcode == "BZE":
            if pile[-1] == 0:
                ip = args[0]
                pile.pop()
                continue
            else:
                pile.pop()
        elif opcode == "HLT":
            halt = True
        else:
            print(f"Instruction inconnue : {opcode}")

        ip += 1

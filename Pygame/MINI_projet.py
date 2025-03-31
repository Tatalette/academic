import pygame
import math
import time
import random

# init module
pygame.init()
clock = pygame.time.Clock()

# creation fenetre
dimWindow = (1920,1080)
ecran = pygame.display.set_mode(dimWindow)

# declaration image
img = pygame.image.load("cochon.png").convert_alpha()
rect = img.get_rect()
rect.center = (960,540)

# police d'écriture
police = pygame.font.Font(None,72)

# déclaration des variables
nbSecondes = random.randint(1000,6000)/1000
# start chrono
startProgram = time.time()
# fond
fillColor = (255,255,255)
fillColorGreen = (130,255,130)
# flag programm status
changeColor = False
startTime = None
clickTime = None
clicked = False
# Variable text picture
imgTexte = None

# boucle principale
fin = False
while not fin:
    #Gestion clock
    if not changeColor and time.time() - startProgram >= nbSecondes:
        changeColor = True
        startTime = time.time()
    #Gestion evenements
    for event in pygame.event.get():
        if event.type == pygame.MOUSEBUTTONDOWN:
            if event.button == 1 and rect.collidepoint(pygame.mouse.get_pos()):
                clicked = True
                if changeColor:
                    clickTime = time.time()
                    reactionTime = clickTime - startTime
                    reacText = "temps de réaction : " + str(reactionTime) + "secondes"
                    imgTexte = police.render(reacText,True,(229,254,6))
                else:
                    reacText = "Aïe trop rapide"
                    imgTexte = police.render(reacText,True,(229,254,6))
        if event.type == pygame.KEYDOWN:
            if event.key == pygame.K_TAB or event.key == pygame.K_ESCAPE:
                fin = True
    #Affichage
    if changeColor:
        ecran.fill(fillColorGreen)
    else:
        ecran.fill(fillColor)
    ecran.blit(img,rect)
    if clicked:
        ecran.blit(imgTexte, imgTexte.get_rect(center=(960,540)))
    pygame.display.flip()
    clock.tick(60)

pygame.quit()
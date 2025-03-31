import pygame

"""Avant propos : complétion automatique par IA pour les commentaires # """
# Initialize pygame

pygame.init()

# Define window dimensions and create the window
dimWindow = (1920,1080)
ecran = pygame.display.set_mode(dimWindow)

# Define a rectangle and position it in the middle of the screen
rec = pygame.Rect(0,0,200,200)
rec.center = (960,540)

# Load a font and display a text
police = pygame.font.Font(None, 120)


fin = False
while not fin:
    # Boucle d'écoute
    for event in pygame.event.get():
        if event.type == pygame.KEYDOWN:
            if event.key == pygame.K_TAB or event.key == pygame.K_ESCAPE:
                fin = True
            if event.key == pygame.K_UP:
                rec.move_ip(0,-5)
            elif event.key == pygame.K_DOWN:
                rec.move_ip(0,5)
            elif event.key == pygame.K_LEFT:
                rec.move_ip(-5,0)
            elif event.key == pygame.K_RIGHT:
                rec.move_ip(5,0)
    posText = "Position actuelle : " + str(rec.x) + ", " + str(rec.y)
    #Rafraichissement
    ecran.fill((0,0,0))
    imgText = police.render(posText,True,(229,254,6))
    recText = imgText.get_rect(center=(100,200))
    ecran.blit(imgText,recText)
    pygame.draw.rect(ecran,(55,55,255),rec)
    pygame.display.flip()
                
pygame.quit()
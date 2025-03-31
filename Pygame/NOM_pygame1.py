import pygame

pygame.init()

dimensionsFenetre = (800,600)
ecran = pygame.display.set_mode(dimensionsFenetre)

fin = False
while not fin:
    for event in pygame.event.get():
        if event.type == pygame.KEYDOWN:
            if event.key == pygame.K_TAB or event.key == pygame.K_ESCAPE:
                fin = True

pygame.quit()
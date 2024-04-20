# Simple Backup to CMS Joomla

Crido de forma muito livre e nada convencional.

## Compatível com as versões 3, 4 e 5 do Joomla

[![Licença](https://img.shields.io/aur/license/yaourt.svg)](https://github.com/ribafs/simplebackup/blob/master/LICENSE)

## Main Resources
    Backup to download on desktop 
    Very simple backup
    Support Joomla 3, 4 e 5
    Translated to portuguese and english
    Exclude one folder

## Download
https://ribamar.net.br/down/devel/backend/CMS/Joomla/com_backupx.zip
https://github.com/ribafs/com_simplebackup

## Configurações

Zero, nenhuma configuração.

## Observação
A pasta a ser desconsiderada na compactação é fixa "down". Para alterá-la, mude a linha:

$exclude = $params->get('exclude_folder', "'*down*'");

No arquico backup.php

## Usando

- Clique no componente
- Iniciar e aguarde
- Clique nos links para fazer o download.
Obs: O componente guarda apenas o ultimo backup. Caso queira mais de uma copia, guarde em seu desktop.

## Resultado
Gerado um arquivo zip e um sql para download a pasta

administrator/components/com_simplebackup/backups

License
-------

The GPL 3.0 License (GPL 3)

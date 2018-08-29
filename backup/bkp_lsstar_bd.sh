#!/bin/sh
# bkp_seubanco.sh

# DATA vai imprimir a data no estio dia-mes-ano
DATA=`/bin/date +%d-%m-%Y-%H-%M-%S`

# NOME armazena o nome do arquivo de backup e
# o diretorio onde o arquivo será salvo no meu caso
# /www/virtual/backup é uma pasta publica do apache,
# coloque o diretório onde quer guardar o backup.

NOME="mysql/lsstar-$DATA.sql"

# variaveis do MySQL
HOST="#"
USER="#"
PASSWORD="#"
DATABASE="#"

mysqldump -h $HOST -u $USER -p$PASSWORD $DATABASE > $NOME

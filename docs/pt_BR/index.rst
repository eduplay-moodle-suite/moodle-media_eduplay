moodle-media_eduplay
====================

O **moodle-media_eduplay** é um media player do Moodle que transforma links de vídeos do EduPlay no player oficial do EduPlay (iframe). Ele usa a Media API do Moodle, então o filtro nativo *Plugins de multimídia* incorpora os vídeos onde estiver habilitado. Faz parte da **EduPlay Moodle Suite** (não oficial) e depende do `moodle-local_eduplay <https://eduplay-moodle-suite.github.io/moodle-local_eduplay/>`_.

English version: `English <../en/index.html>`_.

.. warning::

   Este projeto não é oficial. Não possui afiliação, endosso ou representação da RNP, do EduPlay ou do Moodle HQ.

.. toctree::
   :maxdepth: 2
   :caption: Conteúdo

   installation
   configuration
   usage

Principais recursos
-------------------

* **Cole e reproduza**: um link como ``https://eduplay.rnp.br/app/video/353479`` vira o player oficial.
* **Responsivo e acessível**: layout 16:9, ``title`` significativo no iframe, sem reprodução automática e link de fallback para o vídeo.
* **Seguro por projeto**: só URLs canônicas aceitas pelo ``local_eduplay`` são incorporadas; o resto continua como link normal.
* **Moodle 4.5 LTS e 5.3 LTS**.

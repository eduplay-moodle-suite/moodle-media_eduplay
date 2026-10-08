Instalação
==========

Requisitos
----------

* Moodle 4.5 LTS ou 5.3 LTS.
* O plugin `local_eduplay <https://github.com/eduplay-moodle-suite/moodle-local_eduplay>`_, instalado antes.

Passos
------

1. Instale o ``local_eduplay`` em ``local/eduplay``.
2. Instale este plugin em ``media/player/eduplay`` (envio de ZIP com a pasta raiz ``eduplay``, ou Git):

   .. code-block:: bash

      git clone https://github.com/eduplay-moodle-suite/moodle-media_eduplay.git media/player/eduplay

3. Abra *Administração do site* > *Notificações* para concluir a instalação. No Moodle 5.1 ou superior, use ``public/`` como diretório base.

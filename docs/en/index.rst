moodle-media_eduplay
====================

**moodle-media_eduplay** is a Moodle media player that turns EduPlay video links into the official EduPlay player (iframe). It plugs into the Moodle Media API, so the native *Multimedia plugins* filter embeds videos wherever it is enabled. It is part of the unofficial **EduPlay Moodle Suite** and depends on `moodle-local_eduplay <https://eduplay-moodle-suite.github.io/moodle-local_eduplay/>`_.

Versão em português: `Português (Brasil) <../pt-br/index.html>`_.

.. warning::

   This project is unofficial. It has no affiliation with, or endorsement by, RNP, EduPlay or Moodle HQ.

.. toctree::
   :maxdepth: 2
   :caption: Contents

   installation
   configuration
   usage

Main features
-------------

* **Paste and play**: a link such as ``https://eduplay.rnp.br/app/video/353479`` becomes the official player.
* **Responsive and accessible**: 16:9 layout, meaningful iframe ``title``, no autoplay and a fallback link to the video.
* **Safe by design**: only canonical URLs accepted by ``local_eduplay`` are embedded; everything else stays a normal link.
* **Moodle 4.5 LTS and 5.3 LTS**.

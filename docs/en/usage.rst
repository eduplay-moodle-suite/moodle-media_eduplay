Usage
=====

In any text processed by the Multimedia plugins filter (pages, labels, books, forums, URL resources...), paste the canonical link on its own:

.. code-block:: text

   https://eduplay.rnp.br/app/video/353479

It is shown as the official player (``https://eduplay.rnp.br/app/video/embed/353479``). The link text, when you use one, becomes the iframe title for screen readers. Below the player, a link opens the video on EduPlay.

Links that are not canonical EduPlay video URLs (other hosts, ``http``, the embed route, extra ports or credentials) are left as normal links.

Accessibility
~~~~~~~~~~~~~

Checked on 2026-10-09 with Moodle 5.3 and axe-core 4.10.2 on the rendered player (no violations reported).

* The iframe has a ``title``: the link text when there is one, otherwise a generic title. Write a meaningful link text.
* No autoplay; ``allow`` only grants fullscreen and picture-in-picture.
* A visible text link below the player opens the video on EduPlay (a fallback when the iframe is blocked or unusable).
* Responsive: at 375 px wide the player keeps the 16:9 ratio and there is no horizontal scrolling.

Not verified: what happens **inside** the EduPlay player (controls, keyboard operation, captions, contrast) is controlled by EduPlay, and axe does not look into the cross-origin frame; a screen-reader test (NVDA/VoiceOver) was not done.

Uso
===

Em qualquer texto processado pelo filtro de Plugins de multimídia (páginas, rótulos, livros, fóruns, recursos URL...), cole o link canônico sozinho:

.. code-block:: text

   https://eduplay.rnp.br/app/video/353479

Ele é exibido como o player oficial (``https://eduplay.rnp.br/app/video/embed/353479``). O texto do link, quando houver, vira o título do iframe para leitores de tela. Abaixo do player, um link abre o vídeo no EduPlay.

Links que não sejam URLs canônicas de vídeo do EduPlay (outros hosts, ``http``, a rota de embed, portas ou credenciais) permanecem como links normais.

Acessibilidade
~~~~~~~~~~~~~~

Verificado em 2026-10-09 com Moodle 5.3 e axe-core 4.10.2 no player renderizado (nenhuma violação).

* O iframe tem ``title``: o texto do link, quando há, ou um título genérico. Escreva um texto de link significativo.
* Sem autoplay; ``allow`` só concede tela cheia e picture-in-picture.
* Um link de texto visível abaixo do player abre o vídeo no EduPlay (alternativa quando o iframe está bloqueado ou inutilizável).
* Responsivo: com 375 px de largura o player mantém a proporção 16:9 e não há rolagem horizontal.

Não verificado: o que acontece **dentro** do player do EduPlay (controles, teclado, legendas, contraste) é controlado pelo EduPlay, e o axe não enxerga o frame de outra origem; não foi feito teste com leitor de tela (NVDA/VoiceOver).

 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript">
      jQuery.ajaxSetup({cache: true});

      jQuery.getScript('http://chat.postwork.itinet.fr/server/get.php?l=fr&t=js&g=mini.xml', function() {
        // Configure application & connect user
        // Notice: exclude "user" and "password" if using anonymous login
        JappixMini.launch({
          connection: {
          	user: 'jc',
          	password: 'Kt5B5bZCD',
            domain: 'postwork.itinet.fr',
            resource: 'Jappix'
          },

          application: {
            network: {
              autoconnect: false
            },

            interface: {
              showpane: true,
              animate: true
            },

            user: {
              random_nickname: true
            },

            chat: {
              open: []
            },

            groupchat: {
              open: ['portfolio@muc.postwork.itinet.fr'],
              open_passwords: []
            }
          }
        });
      });
    </script>
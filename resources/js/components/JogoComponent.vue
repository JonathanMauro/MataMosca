<template>
    <div class="painel">
        <div class="vidas">
            <img :src="imagemVida1" alt="">
            <img :src="imagemVida2" alt="">
            <img :src="imagemVida3" alt="">
        </div>
        <div class="cronometro">Tempo restante: <span id="cronometro">{{ tempo }}</span></div>
    </div>
</template>

<script>
export default {
    props: [],
    data() {
        return {
            altura: '',
            largura: '',
            imagemVida1: 'imagens/coracao_cheio.png',
            imagemVida2: 'imagens/coracao_cheio.png',
            imagemVida3: 'imagens/coracao_cheio.png',
            tempo: 10,
            criaMosquitoTempo: 0
        }
    },
    methods: {
        ajustaTamanho() {
            //ajustando o tamanho da tela para onde possa ser renderizado a imagem
            this.altura = window.innerHeight;
            this.largura = window.innerWidth;

            this.nivelDoJogo();
            this.coordenadasImg()
            this.criaMosquito()
            this.cronometro()
        },
        coordenadasImg() {
            //remover mosquito anterior (caso exista)
            if (document.getElementById('mosquito')) {
                document.getElementById('mosquito').remove()

                if (this.imagemVida1 == 'imagens/coracao_cheio.png') {
                    this.imagemVida1 = 'imagens/coracao_vazio.png'
                } else {
                    if (this.imagemVida2 == 'imagens/coracao_cheio.png') {
                        this.imagemVida2 = 'imagens/coracao_vazio.png'
                    } else {
                        if (this.imagemVida3 == 'imagens/coracao_cheio.png') {
                            this.imagemVida3 = 'imagens/coracao_vazio.png'
                        } else {
                            window.location.href = '/fimdejogo'
                        }
                    }
                }
            }

            //gerando a localização da imagem de forma randomica
            let posicaoX = Math.floor(Math.random() * this.largura) - 90;
            let posicaoY = Math.floor(Math.random() * this.altura) - 90;

            //caso a posição seja menor que zero, a posição será igual a zero, caso não seja, permanece o valor gerado
            posicaoX = posicaoX < 0 ? 0 : posicaoX
            posicaoY = posicaoY < 0 ? 0 : posicaoY

            //criação da imagem em tela
            let mosquito = document.createElement('img');
            mosquito.src = 'imagens/mosca.png'
            mosquito.className = this.tamanhoAleatorio() + ' ' + this.ladoAleatorio()
            mosquito.style.left = posicaoX + 'px'
            mosquito.style.top = posicaoY + 'px'
            mosquito.style.position = 'absolute'
            mosquito.id = 'mosquito'
            //remoção do elemento após o clique
            mosquito.onclick = function () {
                this.remove()
            }

            document.body.appendChild(mosquito)



        },
        tamanhoAleatorio() {
            //alteração do tamanho da imagem
            const classe = Math.floor(Math.random() * 3);

            switch (classe) {
                case 0:
                    return 'mosquito1'
                case 1:
                    return 'mosquito2'
                case 2:
                    return 'mosquito3'
            }
        },
        ladoAleatorio() {
            //alteração do lado da imagem na tela
            const classe = Math.floor(Math.random() * 2);

            switch (classe) {
                case 0:
                    return 'ladoA'
                case 1:
                    return 'ladoB'

            }
        },
        cronometro() {
            const intervalID = setInterval(() => {
                this.tempo -= 1
                if (this.tempo <= 0) {
                    clearInterval(intervalID)
                    clearInterval(this.criaMosquito)
                    window.location.href = '/vitoria'
                } else {
                }
            }, 1000)
        },
        nivelDoJogo() {
            let nivelSelecionado = window.location.search;
            nivelSelecionado = nivelSelecionado.replace('?', '');

            if (nivelSelecionado === 'normal') {
                // 2000
                this.criaMosquitoTempo = 2000;
            } else if (nivelSelecionado === 'dificil') {
                // 1000
                this.criaMosquitoTempo = 1000;
            } else if (nivelSelecionado === 'chucknorris') {
                // 750
                this.criaMosquitoTempo = 750;
            }
            console.log(this.criaMosquitoTempo);
        },
        criaMosquito() {
            setInterval(() => {
                this.coordenadasImg();
            }, this.criaMosquitoTempo);
        },

    },
    mounted() {
        this.ajustaTamanho()

        window.addEventListener('resize', this.ajustaTamanho);




    },
    beforeDestroy() {
        // Remove o ouvinte de evento ao destruir o componente
        window.removeEventListener('resize', this.ajustaTamanho);
    },
}
</script>

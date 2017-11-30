<template>
    <div>
        <section id="cardapio" class="container">

            <div class="row">

                   <div class="col-sm-12 col-lg-8">
                      <div class="sessao-de-produtos"  v-for="(itens, tipo) in produtos">
                          <h2>{{ tipo }}</h2>
                          <article class="item" v-for="item in itens" v-on:click="addCarrinho(item)">

                              <div class="info">
                                  <h3>{{ item.nome }}</h3>
                                  <p v-if="item.descricao">{{ item.descricao }}</p>
                                  <p v-else>----</p>
                              </div>
                              <div class="valor-text">
                                  <h4>valor</h4>
                                  <h5>R${{ item.valor }}</h5>
                              </div>
                          </article>
                      </div>
                   </div>


                <div class="col-sm-12 col-lg-4">
                    <div id="sidebar">
                        <h2>Carrinho</h2>
                        <ul>

                            <li class="item-carrinho" v-for="(item, id) in carrinho"><span class="text"><button class="remover" v-on:click="removeCarrinho(id)"><i class="fa fa-times-circle" aria-hidden="true"></i></button>{{ item.nome }}</span><span class="price">R${{ item.valor }}</span></li>

                            <li class="total-pedido"><span class="text">Total</span><span class="price">R${{ totalCarrinho() }}</span></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data() {
            return {
                carrinho: []
            }
        },
        props: ['produtos'],
        methods: {
            addCarrinho : function (item) {
                this.carrinho.push(item);
            },
            removeCarrinho : function(id){
                this.carrinho.splice(id, 1);
            },
            totalCarrinho : function () {
                if(this.carrinho.length > 0) {
                    var total = 0;
                    this.carrinho.forEach(function(item){
                       total += parseFloat(item.valor);
                    });
                    return total;
                }
                return 0.00;
            }
        }
    }
</script>

<style lang="scss" scoped>
    #cardapio{
        margin-top: 25px;
        #sidebar{
            margin-top: 25px;
        }
    }
    .sessao-de-produtos{
        margin-bottom: 40px;
    }
</style>
<template>
    <div class="container">
        <h1>{{ hello }}</h1>
        <h1>{{ helloToUpper }}</h1>
        <h1>{{ sum(6, 8) }}</h1>
        <img :src="img" alt="">
        <p v-if="false">True</p>
        <ul>
            <li v-for="(index, car) in this.cars">
                {{ index }} - {{ car }}
            </li>
        </ul>

        <div>
            <h2>Data from vuex</h2>
            <p>Hello {{ fullname }} - {{ name }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
              hello: 'Hello world',
              img: 'https://via.placeholder.com/600/5F1130/FFFFFF/?text=LaravelBlog',
              cars: ['BMW', 'Nissan', 'Volvo']
          }
        },
        computed: {
            helloToUpper() {
                return this.hello.toUpperCase()
            },
            fullname() {
                return this.$store.getters.getFullName
            },
            name() {
                return this.$store.state.firstName
            },
        },
        methods: {
            sum(a, b) {
                return a + b;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<!--scoped - ставит уникальные идентификаторы на элементы компонента-->
<style scoped>

</style>

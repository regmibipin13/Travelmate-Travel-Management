<template>
    <form @submit.prevent="onSubmit" v-if="!is_booked" :style="{ 'pointer-events': is_loading ? 'none' : '' }">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" v-model="customer_name" placeholder="Customer Name">

        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" v-model="customer_phone" placeholder="Customer Phone">

        </div>
        <div class="form-group">
            <label for="from_date">From</label>
            <input type="date" class="form-control" v-model="from_date" placeholder="From">
        </div>

        <div class="form-group">
            <label for="total_people">Total People</label>
            <select v-model="total_person" id="total_people" class="form-control">
                <option :value="n" v-for="(n, index) in package.max_people" :key="n">{{ n }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total">Total Amount</label>
            &nbsp;
            <span>Rs. {{ total }}</span>
        </div>
        <button class="btn btn-block btn-danger" type="submit">
            <div class="spinner-grow" role="status" v-if="is_loading">
                <span class="sr-only">Loading...</span>
            </div>
            <div v-else>
                Book Now
            </div>
        </button>
    </form>
    <span class="text-primary" v-else>
        You have a booking for this already
    </span>
</template>

<script>
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();

export default {
    props: ['package'],
    data: function () {
        return {
            customer_name: '',
            customer_phone: '',
            from_date: '',
            is_booked: 0,
            total_person: 0,
            is_loading: false,
        }
    },
    methods: {
        onSubmit() {
            if (this.customer_name == '' || this.customer_phone == '' || this.from_date == '') {
                $toast.error('Please fill up all the forms');
                return;
            }
            var data = {
                customer_name: this.customer_name,
                customer_phone: this.customer_phone,
                from_date: this.from_date,
                total: this.total,
                package_id: this.package.id,
                total_people: this.total_person
            }
            var uri = `/package/${this.package.id}/book`;
            axios.post(uri, data).then((response) => {
                $toast.success('Your Booking for the package is done. You will be soon notified by our helper');
                this.is_booked = true;
            }).error((error) => {
                $toast.error('Your Booking Process is failed . Please try again later');
            })

        }
    },
    computed: {
        total() {
            return parseFloat(this.package.total_price) * parseInt(this.total_person ?? 0);
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

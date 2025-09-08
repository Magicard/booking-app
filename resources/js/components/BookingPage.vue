<template id="body">
    <div class="flex justify-center" id="card">
        <form @submit.prevent="submitBooking" class="space-y-4 bg-red-800">
            <h1 class="">Create a Booking</h1>
            <div>
                <label class="block">Title:</label>
                <input v-model="booking.title" type="text" class="border p-2 w-full bg-black"/>
            </div>

            <div>
                <label class="block bg-red-800">Description:</label>
                <textarea v-model="booking.description" class="border p-2 w-full"></textarea>
            </div>

            <div class="rows gap-4">
                <div>
                    <label>Start Time:</label>
                    <input v-model="booking.start_time" type="datetime-local" class="border p-2 bg-black white"/>
                </div>
                <div>
                    <label>End Time:</label>
                    <input v-model="booking.end_time" type="datetime-local" class="border p-2"/>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Booking</button>
        </form>

        <div v-if="message" class="mt-4 p-2 bg-green-200 text-green-800 rounded">
            {{ message }}
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            booking: {
                title: '',
                description: '',
                start_time: '',
                end_time: ''
            },
            message: ''
        }
    },
    methods: {
        async submitBooking() {
            try {
                const res = await fetch('/api/bookings', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(this.booking)
                });
                const data = await res.json();
                this.message = 'Booking created successfully!';
                this.booking = { title: '', description: '', start_time: '', end_time: '' };
            } catch (err) {
                console.error(err);
                this.message = 'Error creating booking';
            }
        }
    }
}
</script>

<style scoped>
#card {
    width: 400px;
    margin-top: 50px;
    margin: auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    background-color: #1a202c;
    color: white;
}
</style>

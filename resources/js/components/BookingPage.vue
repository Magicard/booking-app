<template>
    <body class="font-sans">
    <div class="grid-3 content-center w-full">
        <div id="page-content" class="transition-{filter} duration-300" :class="{'blur-sm': showModal}">
            <div class="flex justify-between items-center py-10 px-10 bg-linear-to-r from-blue-500 to-blue-300 text-white">
                <div class="text-4xl font-black uppercase text-shadow-lg text-shadow-sky-100/20">Booking App</div>
                <button @click="showModal = !showModal"  class="bg-white  text-blue-400 text-shadow-lg text-shadow-sky-100/30 uppercase text-lg  font-black px-4 py-2 rounded hover:bg-gray-100 ">
                    Create a Booking
                </button>
            </div>

            <!--        <div class="w-full border-b-5 border-gray-200 shadow"></div>-->

            <div class="flex items-end gap-4 pl-5 py-4 bg-gray-900">
                <div class="flex flex-col">
                    <input v-model="weekDate" id="week_date" type="date" class="border text-gray-600 p-1.75 rounded antialiased bg-gray-50">
                </div>
                <button @click="loadWeek"
                        class="bg-gray-700 text-white px-4 py-2 rounded font-bold hover:bg-gray-800">
                    FILTER
                </button>
                <button @click="resetWeek"
                        class="bg-red-400 text-red-100 px-4 py-2 rounded font-bold hover:bg-red-300 ml-auto mr-5">
                    RESET
                </button>
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Booking title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <span>Start Time</span>
                                <a href="#" class="ml-1">
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg></a>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <span>End Time</span>
                                <a href="#" class="ml-1">
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg></a>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <span>Client</span>
                                <a href="#" class="ml-1">
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg></a>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <span>User</span>
                                <a href="#" class="ml-1">
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg></a>
                                </a>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="b in bookings" :key="b.id" class="odd:bg-white even:bg-gray-90">
                        <th class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            {{ b.title }}
                        </th>
                        <td class="px-6 py-4">{{ b.description }}</td>
                        <td class="px-6 py-4">{{ new Date(b.start_time).toLocaleString() }}</td>
                        <td class="px-6 py-4">{{ new Date(b.end_time).toLocaleString() }}</td>
                        <td class="px-6 py-4">{{ b.client?.name || b.client_id }}</td>
                        <td class="px-6 py-4">{{ b.user?.name || b.user_id }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div v-if="showModal" id="modal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center shadow-lg" @click.self="showModal = false">
            <div class="flex justify-center mt-15 border-3 shadow w-100 p-4 rounded-xl border-blue-400 shadow mx-auto bg-white" id="card">
                <form @submit.prevent="submitBooking" class="space-y-4 antialiased">
                    <h3 class=" text-2xl font-bold antialiased text-blue-400">NEW BOOKING</h3>
                    <div class="w-full border-b-5 border-blue-400"></div>
                    <div>
                        <label class="font-bold">Title</label>
                        <input v-model="booking.title" type="text" class="border rounded p-2 w-full"/>
                    </div>

                    <div>
                        <label class="font-bold">Description</label>
                        <input v-model="booking.description" type="text" class="border rounded p-2 w-full"/>
                    </div>

                    <div >
                        <div>
                            <label class="font-bold">Start Time </label>
                            <input v-model="booking.start_time" type="datetime-local" class="border p-2 text-gray-700"/>
                        </div>
                        <div class="mt-2">
                            <label class="font-bold">End Time </label>
                            <input v-model="booking.end_time" type="datetime-local" class="border p-2 ml-2 text-gray-700"/>
                        </div>
                    </div>
                    <div v-if="message" class="mt-4 p-2 bg-gray-200 text-black rounded">
                        {{ message }}
                    </div>
                    <button type="submit" class="bg-blue-400 text-white w-full py-2 rounded antialiased font-bold shadow hover:bg-blue-300">SUBMIT</button>
                </form>


            </div>
        </div>
    </div>
    </body>
</template>


<script>
export default {
    data() {
        return {
            showModal: false,
            bookings: [],
            weekDate: '',
            booking: { title: '', description: '', start_time: '', end_time: '', user_id: 1, client_id: 1 },
            message: ''
        }
    },
    mounted() {
        this.loadWeek();
    },
    methods: {
        async loadWeek() {
            try {
                const res = await fetch('/api/bookings?week_date=' + this.weekDate);
                this.bookings = await res.json();
            } catch (err) {
                console.error(err);
            }
        },
        async submitBooking() {
            try {
                const res = await fetch('/api/bookings', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(this.booking)
                });
                if (!res.ok) {
                    const err = await res.json();
                    throw err;
                }
                this.message = 'Booking created successfully!';
                this.booking = {
                    title: '',
                    description: '',
                    start_time: '',
                    end_time: '',
                    user_id: 1,
                    client_id: 1
                };
                this.showModal = false;
                await this.loadWeek(); // refresh table
            } catch (err) {
                this.message = 'Error creating booking';
                console.error(err);
            }
        },
    }
}
</script>

<style scoped>
</style>

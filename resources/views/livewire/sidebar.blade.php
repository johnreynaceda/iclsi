    <div>
        <div class="p-5">
            <div class="flex justify-end items-center">
                <button class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-bell-ring">
                        <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                        <path d="M22 8c0-2.3-.8-4.3-2-6" />
                        <path
                            d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
                        <path d="M4 2C2.8 3.7 2 5.7 2 8" />
                    </svg>
                </button>
            </div>
            <div class="mt-5 flex justify-center items-center">
                <div class="h-32 w-32 bg-gradient-to-bl from-yellow-500 via-yellow-100 to-gray-100 p-1 rounded-full">
                    <img src="{{ asset('images/default.jpg') }}" class="rounded-full" alt="">
                </div>
            </div>
            <div class="text-center mt-3">

                <div class="flex space-x-1 items-center justify-center">
                    <h1 class="text-lg text-white">Good Day! {{ auth()->user()->name }}</h1>
                    <x-shared.fire class="h-7" />

                </div>
            </div>
        </div>

        <div class="flex items-center justify-center py-3 px-4" x-data="calendar()">
            <div class="max-w-sm w-full">
                <div class="md:p-5 p-2 dark:bg-gray-800 bg-white rounded-3xl">
                    <div class="px-4 flex items-center justify-between">
                        <span tabindex="0"
                            class="focus:outline-none text-base font-bold dark:text-gray-100 text-gray-800"
                            x-text="monthNames[currentMonth] + ' ' + currentYear"></span>
                        <div class="flex items-center">
                            <button aria-label="calendar backward"
                                class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100"
                                @click="previousMonth">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="15 6 9 12 15 18" />
                                </svg>
                            </button>
                            <button aria-label="calendar forward"
                                class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100"
                                @click="nextMonth">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler  icon-tabler-chevron-right" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-12 overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <template x-for="day in days">
                                        <th>
                                            <div class="w-full flex justify-center">
                                                <p class=" font-medium text-center text-gray-800 " x-text="day"></p>
                                            </div>
                                        </th>
                                    </template>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="week in calendarDays">
                                    <tr>
                                        <template x-for="day in week">
                                            <td class="pt-5">
                                                <div class="cursor-pointer flex hover:bg-green-500 hover:text-white hover:rounded-full w-full justify-center"
                                                    :class="{
                                                        'bg-green-500 text-white rounded-full': day
                                                            .isToday,
                                                        'text-gray-500': !day.isToday
                                                    }">
                                                    <p x-text="day.date"></p>
                                                </div>
                                            </td>
                                        </template>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function calendar() {
                return {
                    currentDate: new Date(),
                    currentMonth: new Date().getMonth(),
                    currentYear: new Date().getFullYear(),
                    days: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                    monthNames: [
                        'January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'
                    ],
                    calendarDays: [],
                    generateCalendar() {
                        const startOfMonth = new Date(this.currentYear, this.currentMonth, 1);
                        const endOfMonth = new Date(this.currentYear, this.currentMonth + 1, 0);
                        const startDay = startOfMonth.getDay() || 7; // Sunday fix for zero-based day
                        const daysInMonth = endOfMonth.getDate();

                        let days = [];
                        for (let i = 1 - (startDay - 1); i <= daysInMonth; i += 7) {
                            let week = [];
                            for (let j = i; j < i + 7; j++) {
                                const day = j > 0 && j <= daysInMonth ? j : null;
                                week.push({
                                    date: day,
                                    isToday: day === this.currentDate.getDate() &&
                                        this.currentMonth === this.currentDate.getMonth() &&
                                        this.currentYear === this.currentDate.getFullYear(),
                                });
                            }
                            days.push(week);
                        }
                        this.calendarDays = days;
                    },
                    nextMonth() {
                        if (this.currentMonth === 11) {
                            this.currentMonth = 0;
                            this.currentYear++;
                        } else {
                            this.currentMonth++;
                        }
                        this.generateCalendar();
                    },
                    previousMonth() {
                        if (this.currentMonth === 0) {
                            this.currentMonth = 11;
                            this.currentYear--;
                        } else {
                            this.currentMonth--;
                        }
                        this.generateCalendar();
                    },
                    init() {
                        this.generateCalendar();
                    },
                };
            }
        </script>

        <div class="p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold text-white">Events</h1>
                <a href="" class="text-white flex space-x-1">
                    <span>View All</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-external-link">
                        <path d="M15 3h6v6" />
                        <path d="M10 14 21 3" />
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                    </svg>
                </a>
            </div>
            <ul class="mt-3 space-y-2">
                @forelse ($events as $item)
                    <li class="bg-white p-5 rounded-2xl flex space-x-4 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-calendar-1 text-green-600">
                            <path d="M11 14h1v4" />
                            <path d="M16 2v4" />
                            <path d="M3 10h18" />
                            <path d="M8 2v4" />
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                        </svg>
                        <div class="text-gray-700">
                            <h1 class="uppercase font-semibold">{{ $item->name }}</h1>
                            <h1 class="leading-3 text-sm">
                                {{ \Carbon\Carbon::parse($item->date_of_event)->format('F d, Y') }}</h1>
                        </div>
                    </li>
                @empty
                    <p class="text-center text-gray-600">No events found.</p>
                @endforelse

            </ul>
        </div>
    </div>

<template>
    <!-- 3 column wrapper -->
    <div class="flex-grow w-full max-w-7xl mx-auto xl:px-8 lg:flex">
        <!-- Left sidebar & main wrapper -->
        <div class="flex-1 min-w-0 bg-white xl:flex">
            <!-- Account profile -->
            <div
                class="xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200 bg-white"
            >
                <div class="pl-4 pr-6 py-6 sm:pl-6 lg:pl-8 xl:pl-0">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 space-y-8">
                            <div
                                class="space-y-8 sm:space-y-0 sm:flex sm:justify-between sm:items-center xl:block xl:space-y-8"
                            >
                                <!-- Profile -->
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <img
                                            class="h-12 w-12 rounded-full"
                                            :src="profileIcon"
                                            alt=""
                                        />
                                    </div>
                                    <div
                                        v-if="this.user.github"
                                        class="space-y-1"
                                    >
                                        <div
                                            class="text-sm font-medium text-gray-900"
                                        >
                                            {{ this.user.name }}
                                        </div>
                                        <a
                                            :href="
                                                this.user.github
                                                    ? this.user.github.html_url
                                                    : '#'
                                            "
                                            target="_blank"
                                            class="group flex items-center space-x-2.5"
                                        >
                                            <svg
                                                class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                aria-hidden="true"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            <span
                                                class="text-sm text-gray-500 group-hover:text-gray-900 font-medium"
                                                >{{
                                                    this.user.github
                                                        ? this.user.github.name
                                                        : "Not logged in"
                                                }}</span
                                            >
                                        </a>
                                    </div>
                                </div>
                                <!-- Action buttons -->
                                <div
                                    class="flex flex-col sm:flex-row xl:flex-col"
                                >
                                    <button
                                        type="button"
                                        class="mt-3 inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 xl:ml-0 xl:mt-3 xl:w-full"
                                    >
                                        Invite Team
                                    </button>
                                </div>
                            </div>
                            <!-- Meta info -->
                            <div
                                class="flex flex-col space-y-6 sm:flex-row sm:space-y-0 sm:space-x-8 xl:flex-col xl:space-x-0 xl:space-y-6"
                            >
                                <div class="flex items-center space-x-2">
                                    <BadgeCheckIcon
                                        class="h-5 w-5 text-gray-400"
                                        aria-hidden="true"
                                    />
                                    <span
                                        class="text-sm text-gray-500 font-medium"
                                        >Pro Member</span
                                    >
                                </div>
                                <div class="flex items-center space-x-2">
                                    <CollectionIcon
                                        class="h-5 w-5 text-gray-400"
                                        aria-hidden="true"
                                    />
                                    <span
                                        class="text-sm text-gray-500 font-medium"
                                        >{{ projects.length }} Projects</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects List -->
            <div class="bg-white lg:min-w-0 lg:flex-1">
                <div
                    class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0"
                >
                    <div class="flex items-center">
                        <h1 class="flex-1 text-lg font-medium">Projects</h1>
                        <Menu as="div" class="relative">
                            <MenuButton
                                class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                <SortAscendingIcon
                                    class="mr-3 h-5 w-5 text-gray-400"
                                    aria-hidden="true"
                                />
                                Sort
                                <ChevronDownIcon
                                    class="ml-2.5 -mr-1.5 h-5 w-5 text-gray-400"
                                    aria-hidden="true"
                                />
                            </MenuButton>
                            <MenuItems
                                class="origin-top-right z-10 absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            >
                                <div class="py-1">
                                    <MenuItem v-slot="{ active }">
                                        <a
                                            href="#"
                                            :class="[
                                                active
                                                    ? 'bg-gray-100 text-gray-900'
                                                    : 'text-gray-700',
                                                'block px-4 py-2 text-sm',
                                            ]"
                                            >Name</a
                                        >
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a
                                            href="#"
                                            :class="[
                                                active
                                                    ? 'bg-gray-100 text-gray-900'
                                                    : 'text-gray-700',
                                                'block px-4 py-2 text-sm',
                                            ]"
                                            >Date modified</a
                                        >
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a
                                            href="#"
                                            :class="[
                                                active
                                                    ? 'bg-gray-100 text-gray-900'
                                                    : 'text-gray-700',
                                                'block px-4 py-2 text-sm',
                                            ]"
                                            >Date created</a
                                        >
                                    </MenuItem>
                                </div>
                            </MenuItems>
                        </Menu>
                    </div>
                </div>
                <ul
                    role="list"
                    class="relative z-0 divide-y divide-gray-200 border-b border-gray-200"
                >
                    <li
                        v-for="project in projects"
                        :key="project.repo"
                        class="relative pl-4 pr-6 py-5 hover:bg-gray-50 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6"
                    >
                        <div
                            class="flex items-center justify-between space-x-4"
                        >
                            <!-- Repo name and link -->
                            <div class="min-w-0 space-y-3">
                                <div class="flex items-center space-x-3">
                                    <span
                                        :class="[
                                            project.active
                                                ? 'bg-green-100'
                                                : 'bg-gray-100',
                                            'h-4 w-4 rounded-full flex items-center justify-center',
                                        ]"
                                        aria-hidden="true"
                                    >
                                        <span
                                            :class="[
                                                project.active
                                                    ? 'bg-green-400'
                                                    : 'bg-gray-400',
                                                'h-2 w-2 rounded-full',
                                            ]"
                                        />
                                    </span>

                                    <span class="block">
                                        <h2 class="text-sm font-medium">
                                            <a :href="project.href">
                                                <span
                                                    class="absolute inset-0"
                                                    aria-hidden="true"
                                                />
                                                {{ project.name }}
                                                <span class="sr-only">{{
                                                    project.active
                                                        ? "Running"
                                                        : "Not running"
                                                }}</span>
                                            </a>
                                        </h2>
                                    </span>
                                </div>
                                <a
                                    :href="project.repoHref"
                                    class="relative group flex items-center space-x-2.5"
                                >
                                    <svg
                                        class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"
                                        viewBox="0 0 18 18"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.99917 0C4.02996 0 0 4.02545 0 8.99143C0 12.9639 2.57853 16.3336 6.15489 17.5225C6.60518 17.6053 6.76927 17.3277 6.76927 17.0892C6.76927 16.8762 6.76153 16.3104 6.75711 15.5603C4.25372 16.1034 3.72553 14.3548 3.72553 14.3548C3.31612 13.316 2.72605 13.0395 2.72605 13.0395C1.9089 12.482 2.78793 12.4931 2.78793 12.4931C3.69127 12.5565 4.16643 13.4198 4.16643 13.4198C4.96921 14.7936 6.27312 14.3968 6.78584 14.1666C6.86761 13.5859 7.10022 13.1896 7.35713 12.965C5.35873 12.7381 3.25756 11.9665 3.25756 8.52116C3.25756 7.53978 3.6084 6.73667 4.18411 6.10854C4.09129 5.88114 3.78244 4.96654 4.27251 3.72904C4.27251 3.72904 5.02778 3.48728 6.74717 4.65082C7.46487 4.45101 8.23506 4.35165 9.00028 4.34779C9.76494 4.35165 10.5346 4.45101 11.2534 4.65082C12.9717 3.48728 13.7258 3.72904 13.7258 3.72904C14.217 4.96654 13.9082 5.88114 13.8159 6.10854C14.3927 6.73667 14.7408 7.53978 14.7408 8.52116C14.7408 11.9753 12.6363 12.7354 10.6318 12.9578C10.9545 13.2355 11.2423 13.7841 11.2423 14.6231C11.2423 15.8247 11.2313 16.7945 11.2313 17.0892C11.2313 17.3299 11.3937 17.6097 11.8501 17.522C15.4237 16.3303 18 12.9628 18 8.99143C18 4.02545 13.97 0 8.99917 0Z"
                                            fill="currentcolor"
                                        />
                                    </svg>
                                    <span
                                        class="text-sm text-gray-500 group-hover:text-gray-900 font-medium truncate"
                                    >
                                        {{ project.repo }}
                                    </span>
                                </a>
                            </div>
                            <div class="sm:hidden">
                                <ChevronRightIcon
                                    class="h-5 w-5 text-gray-400"
                                    aria-hidden="true"
                                />
                            </div>
                            <!-- Repo meta info -->
                            <div
                                class="hidden sm:flex flex-col flex-shrink-0 items-end space-y-3"
                            >
                                <p class="flex items-center space-x-4">
                                    <a
                                        :href="project.siteHref"
                                        class="relative text-sm text-gray-500 hover:text-gray-900 font-medium"
                                    >
                                        Visit site
                                    </a>
                                    <button
                                        type="button"
                                        class="relative bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        <span class="sr-only">{{
                                            project.starred
                                                ? "Add to favorites"
                                                : "Remove from favorites"
                                        }}</span>
                                        <StarIcon
                                            :class="[
                                                project.starred
                                                    ? 'text-yellow-300 hover:text-yellow-400'
                                                    : 'text-gray-300 hover:text-gray-400',
                                                'h-5 w-5',
                                            ]"
                                            aria-hidden="true"
                                        />
                                    </button>
                                </p>
                                <p class="flex text-gray-500 text-sm space-x-2">
                                    <span>{{ project.tech }}</span>
                                    <span aria-hidden="true">&middot;</span>
                                    <span
                                        >Last deploy
                                        {{ project.lastDeploy }}</span
                                    >
                                    <span aria-hidden="true">&middot;</span>
                                    <span>{{ project.location }}</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <div v-if="projects.length <= 0" class="text-center">
                        <svg
                            class="mx-auto h-12 w-12 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                vector-effect="non-scaling-stroke"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"
                            />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">
                            No projects
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Get started by creating a new project.
                        </p>
                        <div class="mt-6">
                            <button
                                type="button"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                <PlusIcon
                                    class="-ml-1 mr-2 h-5 w-5"
                                    aria-hidden="true"
                                />
                                <a href="/project/create" style="all: unset"
                                    >New Project</a
                                >
                            </button>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        <!-- Activity feed -->
        <div
            class="bg-gray-50 pr-4 sm:pr-6 lg:pr-8 lg:flex-shrink-0 lg:border-l lg:border-gray-200 xl:pr-0"
        >
            <div class="pl-6 lg:w-80">
                <div class="pt-6 pb-2">
                    <h2 class="text-sm font-semibold">Activity</h2>
                </div>
                <div>
                    <ul role="list" class="divide-y divide-gray-200">
                        <li
                            v-for="item in activityItems"
                            :key="item.commit"
                            class="py-4"
                        >
                            <div class="flex space-x-3">
                                <img
                                    class="h-6 w-6 rounded-full"
                                    src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=256&h=256&q=80"
                                    alt=""
                                />
                                <div class="flex-1 space-y-1">
                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <h3 class="text-sm font-medium">You</h3>
                                        <p class="text-sm text-gray-500">
                                            {{ item.time }}
                                        </p>
                                    </div>
                                    <p class="text-sm text-gray-500">
                                        Deployed {{ item.project }} ({{
                                            item.commit
                                        }}
                                        in master) to {{ item.environment }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="py-4 text-sm border-t border-gray-200">
                        <a
                            href="#"
                            class="text-indigo-600 font-semibold hover:text-indigo-900"
                            >View all activity
                            <span aria-hidden="true">&rarr;</span></a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

import {
    BadgeCheckIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    CollectionIcon,
    SearchIcon,
    SortAscendingIcon,
    StarIcon,
    PlusIcon,
} from "@heroicons/vue/solid";
import { MenuAlt1Icon, XIcon, ExclamationIcon } from "@heroicons/vue/outline";

const userNavigation = [
    { name: "Your Profile", href: "#" },
    { name: "Settings", href: "#" },
    { name: "Sign out", href: "#" },
];
const projects = [
    // {
    //     name: 'Workcation',
    //     href: '#',
    //     siteHref: '#',
    //     repoHref: '#',
    //     repo: 'debbielewis/workcation',
    //     tech: 'Laravel',
    //     lastDeploy: '3h ago',
    //     location: 'United states',
    //     starred: true,
    //     active: true,
    // },
    // More projects...
];
const activityItems = [
    {
        project: "Workcation",
        commit: "2d89f0c8",
        environment: "production",
        time: "1h",
    },
    // More items...
];

const people = [
    {
        name: "Lindsay Walton",
        handle: "lindsaywalton",
        email: "lindsaywalton@example.com",
        role: "Front-end Developer",
        imageId: "1517841905240-472988babdf9",
        imageUrl:
            "https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
    },
    {
        name: "Courtney Henry",
        handle: "courtneyhenry",
        email: "courtneyhenry@example.com",
        role: "Designer",
        imageId: "1438761681033-6461ffad8d80",
        imageUrl:
            "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
    },
    {
        name: "Tom Cook",
        handle: "tomcook",
        email: "tomcook@example.com",
        role: "Director, Product Development",
        imageId: "1472099645785-5658abf4ff4e",
        imageUrl:
            "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
    },
    {
        name: "Whitney Francis",
        handle: "whitneyfrancis",
        email: "whitneyfrancis@example.com",
        role: "Copywriter",
        imageId: "1517365830460-955ce3ccd263",
        imageUrl:
            "https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
    },
    {
        name: "Leonard Krasner",
        handle: "leonardkrasner",
        email: "leonardkrasner@example.com",
        role: "Senior Designer",
        imageId: "1519345182560-3f2917c472ef",
        imageUrl:
            "https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
    },
    {
        name: "Floyd Miles",
        handle: "floydmiles",
        email: "floydmiles@example.com",
        role: "Principal Designer",
        imageId: "1463453091185-61582044d556",
        imageUrl:
            "https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
    },
];

export default {
    props: ["user"],
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        BadgeCheckIcon,
        ChevronDownIcon,
        ChevronRightIcon,
        CollectionIcon,
        MenuAlt1Icon,
        SearchIcon,
        SortAscendingIcon,
        StarIcon,
        XIcon,
        PlusIcon,
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        ExclamationIcon,
    },
    setup() {
        return {
            userNavigation,
            projects,
            activityItems,
            people,
        };
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            profileIcon: null,
        };
    },

    created() {
        console.log(this.user);
        this.profileIcon = `https://ui-avatars.com/api/?name=${this.user.name.replace(
            " ",
            "+"
        )}&background=0D8ABC&color=fff`;
    },
    methods: {},
};
</script>

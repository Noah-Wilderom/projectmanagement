@extends('layouts.app')

@section('content')
<main class="max-w-lg mx-auto pt-10 pb-12 px-4 lg:pb-16">
    <form action="{{ route('project.store') }}" method="POST">
        @csrf
      <div class="space-y-6">
        <div>
          <h1 class="text-lg leading-6 font-medium text-gray-900">Project Settings</h1>
          <p class="mt-1 text-sm text-gray-500">Let’s get started by filling in the information below to create your new project.</p>
        </div>

        <div>
          <label for="project-name" class="block text-sm font-medium text-gray-700"> Project Name </label>
          <div class="mt-1">
            @livewire('partials.slug-input', [
                'name' => 'project-name',
                'inputId' => 'project-name',
                'classes' => 'block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md'
            ])
          </div>
        </div>

        <div>
          <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
          <div class="mt-1">
            <textarea id="description" name="description" rows="3" class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
          </div>
        </div>

        <div class="space-y-2">
          <div class="space-y-1">
            <label for="add-team-members" class="block text-sm font-medium text-gray-700"> Add Team Members </label>
            <p id="add-team-members-helper" class="sr-only">Search by email address</p>
            <div class="flex">
              <div class="flex-grow">
                <input type="text" name="add-team-members" id="add-team-members" class="block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md" placeholder="Email address" aria-describedby="add-team-members-helper">
              </div>
              <span class="ml-3">
                <button type="button" class="bg-white inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                  <!-- Heroicon name: solid/plus -->
                  <svg class="-ml-2 mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                  </svg>
                  <span>Add</span>
                </button>
              </span>
            </div>
          </div>

          <div class="border-b border-gray-200">
            <ul role="list" class="divide-y divide-gray-200">
              <li class="py-4 flex">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1513910367299-bce8d8a0ebf6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div class="ml-3 flex flex-col">
                  <span class="text-sm font-medium text-gray-900">Calvin Hawkins</span>
                  <span class="text-sm text-gray-500">calvin.hawkins@example.com</span>
                </div>
              </li>

              <li class="py-4 flex">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div class="ml-3 flex flex-col">
                  <span class="text-sm font-medium text-gray-900">Bessie Richards</span>
                  <span class="text-sm text-gray-500">bessie.richards@example.com</span>
                </div>
              </li>

              <li class="py-4 flex">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div class="ml-3 flex flex-col">
                  <span class="text-sm font-medium text-gray-900">Floyd Black</span>
                  <span class="text-sm text-gray-500">floyd.black@example.com</span>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <fieldset>
          <legend class="text-sm font-medium text-gray-900">Privacy</legend>

          <div class="mt-1 bg-white rounded-md shadow-sm -space-y-px">
            <!-- Checked: "bg-sky-50 border-sky-200 z-10", Not Checked: "border-gray-200" -->
            <label class="rounded-tl-md rounded-tr-md relative border p-4 flex cursor-pointer focus:outline-none">
              <input type="radio" name="privacy-setting" value="Public access" class="h-4 w-4 mt-0.5 cursor-pointer text-sky-600 border-gray-300 focus:ring-sky-500" aria-labelledby="privacy-setting-0-label" aria-describedby="privacy-setting-0-description">
              <div class="ml-3 flex flex-col">
                <!-- Checked: "text-sky-900", Not Checked: "text-gray-900" -->
                <span id="privacy-setting-0-label" class="block text-sm font-medium"> Public access </span>
                <!-- Checked: "text-sky-700", Not Checked: "text-gray-500" -->
                <span id="privacy-setting-0-description" class="block text-sm"> This project would be available to anyone who has the link </span>
              </div>
            </label>

            <!-- Checked: "bg-sky-50 border-sky-200 z-10", Not Checked: "border-gray-200" -->
            <label class="relative border p-4 flex cursor-pointer focus:outline-none">
              <input type="radio" name="privacy-setting" value="Private to Project Members" class="h-4 w-4 mt-0.5 cursor-pointer text-sky-600 border-gray-300 focus:ring-sky-500" aria-labelledby="privacy-setting-1-label" aria-describedby="privacy-setting-1-description">
              <div class="ml-3 flex flex-col">
                <!-- Checked: "text-sky-900", Not Checked: "text-gray-900" -->
                <span id="privacy-setting-1-label" class="block text-sm font-medium"> Private to Project Members </span>
                <!-- Checked: "text-sky-700", Not Checked: "text-gray-500" -->
                <span id="privacy-setting-1-description" class="block text-sm"> Only members of this project would be able to access </span>
              </div>
            </label>

            <!-- Checked: "bg-sky-50 border-sky-200 z-10", Not Checked: "border-gray-200" -->
            <label class="rounded-bl-md rounded-br-md relative border p-4 flex cursor-pointer focus:outline-none">
              <input type="radio" name="privacy-setting" value="Private to you" class="h-4 w-4 mt-0.5 cursor-pointer text-sky-600 border-gray-300 focus:ring-sky-500" aria-labelledby="privacy-setting-2-label" aria-describedby="privacy-setting-2-description">
              <div class="ml-3 flex flex-col">
                <!-- Checked: "text-sky-900", Not Checked: "text-gray-900" -->
                <span id="privacy-setting-2-label" class="block text-sm font-medium"> Private to you </span>
                <!-- Checked: "text-sky-700", Not Checked: "text-gray-500" -->
                <span id="privacy-setting-2-description" class="block text-sm"> You are the only one able to access this project </span>
              </div>
            </label>
          </div>
        </fieldset>

        <div>
          <label for="tags" class="block text-sm font-medium text-gray-700"> Tags </label>
          <input type="text" name="tags" id="tags" class="mt-1 block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="flex justify-end">
          <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Cancel</button>
          <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Create this project</button>
        </div>
      </div>
    </form>
  </main>
@endsection

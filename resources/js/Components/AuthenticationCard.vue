<template>
    <div class="w-full min-h-screen flex justify-center items-center bg-gray-50">

        <div class="flex items-start w-[80rem] rounded-xl border border-gray-300 shadow-md">
            <div class="w-1/2 relative">
                <!-- Logo -->
                <slot name="logo"/>
            </div>
    
            <div class="w-1/2">
                <!-- Login form -->
                <slot name="form" />
            </div>
        </div>
    </div>
</template>

<template>
  <LoadingView v-if="isCurrentUser()" :loading="false">
    <heading class="mb-6">{{ __('Passkey Authentication') }}</heading>
    <Card>
      <div class="p-4">
        <p class="mb-4">
          {{ __('Authenticate with fingerprints, patterns and biometric data.') }}
        </p>
        <form id="register-form">
          <button type="submit"
                  @click="register"
                  class="border text-left appearance-none cursor-pointer rounded
                            text-sm font-bold focus:outline-none focus:ring ring-primary-200
                            dark:ring-gray-600 relative disabled:cursor-not-allowed inline-flex
                            items-center justify-center shadow h-9 px-3 bg-primary-500
                            border-primary-500 hover:[&amp;:not(:disabled)]:bg-primary-400
                            hover:[&amp;:not(:disabled)]:border-primary-400 text-white
                            dark:text-gray-900 w-48 flex justify-center">
                        <span class="flex items-center gap-1">
                            <span>{{ __('Register Passkey') }}</span>
                        </span>
          </button>
        </form>
      </div>
    </Card>
  </LoadingView>
</template>

<script async>
import Webpass from '@laragear/webpass/dist/webpass';

const webpass = Webpass.create({
  routes: {
    attestOptions: 'webauthn/register/options',
    attest: 'webauthn/register',
  },
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'X-CSRF-TOKEN': document.head.querySelector(
        'meta[name="csrf-token"]').content
  }
})

export default {
  props: ['resourceName', 'resourceId', 'panel'],

  methods: {
    isCurrentUser: function () {
      return ~~this.resourceId === ~~this.$store.state.currentUser.id
    },
    async register(e) {
      e.preventDefault()

      if (Webpass.isUnsupported()) {
        alert('Your browser does not support WebAuthn.')
        return;
      }

      await webpass.attest().then(response => {
        if (response.success) {
          Nova.success('Registration successful')
        } else {
          Nova.error('Something went wrong')
        }
      }).catch(error => {
        Nova.error(error.message)
      })

    }
  }
}
</script>

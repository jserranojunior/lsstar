// import store from '@/store'
// export const hasToken = ({ token }) => {!!token}


export const hasToken =  ()  => {
    const token = localStorage.getItem('token')

    return token
}
  
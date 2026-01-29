import facebookLogo from '../assets/images/icon-facebook.svg'

export const OverviewCard = ({user, audienceType, audience}) => {
  return (
    <article className="bg-light-grayish-blue w-81.5 h-54 mb-4 rounded-5 mx-auto">
        <img src={facebookLogo} alt='logofacebook'></img>
        <p>{user}</p>
        <p>{audience}</p>
        <p>{audienceType}</p>
    </article>
  )
}

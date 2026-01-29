import { useState,useEffect } from "react";
export const Header = () => {

  const[darkMode, setDarkMode]= useState(false)

  const handleClick =()=>{
    setDarkMode(!darkMode)
  }
  useEffect(()=>{
    if(darkMode){
      document.documentElement.classList.add('dark');
    }else{
      document.documentElement.classList.remove('dark');
    }
  }, [darkMode])

  return (
    <header className="bg-very-pale-blue dark:bg-very-dark-blue h-58.75 rounded-b[20px] pt-8 px-6">
        <h1 className="text-very-dark-blue dark:text-very-pale-blue text-2x1 font-bold mb-1">Social Media Dashboard</h1>
        <p  className="text-dark-grayish-blue dark:text-desaturated-blue font-bold mb-6">Total Followers: 23,004</p>
        <hr className="bg-black mb-4.75"/>
        <div className="flex justify-between">
            <p className="text-dark-grayish-blue dark:text-desaturated-blue font-bold ">Dark Mode</p>
            <label htmlFor="darkmode" className=" relative w-12 h-6 rounded-full overflow-hidden cursor-pointer p-0.75 bg-toggle">
            <input onClick={handleClick} id="darkmode" type="checkbox" className="sr-only peer"/>
            <div className="peer-checked:bg-toggle-gradient w-full h-full absolute top-0 left-0"></div>
            <div className="w-4.5 h-4.5 bg-light-grayish-blue rounded-full peer-checked:translate-x-6 transition-all "></div>
            </label>
        </div>
    </header>
  )
}
